library(tidyverse)
library(MASS)
library(TTR)
library(foreach)
library(ggplot2)
library(xtable)
library(plotly)
library(corrplot)
library(PortfolioAnalytics)
library(xts)


# We train a linear model on the dataset from Jan 2011 to Dec 2016.  
# We then test the performance on the data from March 2017 to July 2017. (Remember your submissions 
# will be tested on randomly chosen dataset from 2018 and NOT 2017. You will be allowed to train your 
# model using data until 2017.)
# Finally we show the computation of R2 which will be used to rank your performance 
# with respect to your peers.

setwd("~/Dropbox/erpcontest/rcode")

dat.raw=read.csv('dataset_original.csv')

# simulation parameters
bounds<-c(-1,1)
x<-xts(dat.raw[,-1], order.by = as.Date(dat.raw[,1]))
x<-x["2010/2018"]
start = 252*5
penalty = 4
max.height = 0.35
ixm =c(seq(1,dim(x)[1],21),dim(x)[1])

dpred=r2=NULL
refitpoints=ixm[ixm>=start]

# create in-sample transformations (nothing to optimize, no need to refit inside WF)
x$DEF<-x$BAA - x$AAA

# return over 60 day moving average for BDIY - baltic dry index.
x$BDIY_returnOverEma60 <- NA
x$BDIY_returnOverEma60[!is.na(x$BDIY)] <- (na.omit(x$BDIY) - EMA(x$BDIY, 60))/EMA(x$BDIY, 60)

# difference from 60 day moving average for HS - Housing starts.
x$HS_levelMinusEma60<-NA
x$HS_levelMinusEma60[!is.na(x$HS)] <- na.omit(x$HS) - EMA(na.omit(x$HS), 60) 

x<-x[,colSums(is.na(x))<1]

training_data = x["2011/2016"]
test_data = x["2017-03-01/2017-06-30"] #x["2017/2017"]

# omit variables with NAs
training_data<-training_data[,colSums(is.na(training_data))<1]
test_data<-test_data[,colSums(is.na(test_data))<1]


# fit the model on the training dataset
# model fitting 
min.model<-lm(ASPFWR5~ 1,na.omit(training_data))
biggest<-formula(lm(ASPFWR5~. ,na.omit(training_data)))
mod<- step(min.model,direction = "forward", scope = biggest,trace =0,k = penalty)

# model summary
summary(mod)

# prediction on the chosen time frame in 2017.
pred =  predict(mod, test_data) 
dpred = c(dpred,pred) 

predictions<-xts(dpred,order.by = as.Date(names(dpred)))
colnames(predictions)<-c("predicted")

# plotting the prediction and the realized data.
par(mar=c(5,5,4,2))
plot(index(test_data), test_data$ASPFWR5,type='l',xlab='Date',ylab='5 day forward ERP',
     col="red", ylim=c(-0.03,0.023), lwd = 2, cex.lab=1.5, cex.axis=1.25)
title("Year 2018")
lines(index(test_data), predictions$predicted,col='blue3', lwd=2)
legend('topright', legend =c('ASPFWR5', 'Predicted'), 
       lty=1, col=c('red', 'blue3'), bty='n', cex=.95)

# Computing R2 for phase I evaluation.
numer1 = sum((test_data$ASPFWR5 - predictions$predicted)^2)
denom1 = sum((test_data$ASPFWR5 - mean(test_data$ASPFWR5))^2)
R2 = 1- (numer1/denom1)
print(R2)