<?php
# Enter page name here
# Will be used in
$page_name = 'Home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $page_name;?> | ERP Contest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/erpcontest.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>

<div class="container">

  <!-- Header -->
  <?php include "header.html"?>


 <!-- Body -->
 <div id="content" class="row">
   <div class="col-sm-2 sidebar">
     
   </div>
   <div class="col-sm-9">
<br>

<font size="3">
The Department of Statistics & Applied Probability and the
Center for Financial Mathematics and Actuarial Research are
partnering with <a href="http://hulltactical.com">Hull
Tactical</a> to run a data science contest on predicting the
S&P 500 returns. Undergraduate and Masters students may
participate in teams of up to 4 members, to compete for prizes
of up to $2500 in two categories: (i) <b> Best Prediction </b>
and (ii) <b> Most Creative.</b> 
</font>

<br>
<br>
<font size="3">
<b> Announcements </b>
</font>
<br>
<br>
<font size="2">
<a href=
  "http://en.wikipedia.org/wiki/Blair_Hull">Blair Hull</a>,
  founder and chairman of Hull Tactical, is giving a special 
  lecture on Thursday February 21 at 5:00pm in Buchanan 1920.
  Here is the original <a href="hull-flyer.pdf">flyer</a>.
</font>

<br>
<br>
<font size="3">
<b> Timeline </b>
</font>
<br>
<br>
<i>
<font size="2">
<ul>
  <li>Team registration opens February 15th.</li>
  <li> <a href=
  "http://en.wikipedia.org/wiki/Blair_Hull">Blair Hull</a>
  of Hull Tactical will make a special presentation 
  on February 21st.</li>
  <li>The first submission deadline for the Best Prediction
  category is April 8th.</li> 
  <li> The live portion of the prediction contest begins
  April 8th and ends May 8th.</li>
  <li>Submissions for the Most Creative category are
  due on May 8th.</li>
  <li>The contest ends May 8th with winners announced soon 
  after.</li>
  <li>Winning teams present their work 
  and are awarded prizes on May 16th.</li>
</ul>
</font>
</i>

<br>
<font size="3">
<b> Registration </b>
</font>

<br>
<br>
<font size="2">
Register your team  <a href="https://goo.gl/forms/hE8Nwm6zRWkz8Fil2">here</a>
or search for like-minded teammates <a
href="https://goo.gl/forms/N6NzZmKIcjYUxihv1">here</a>.
Registration ends on March 15th.
</font>
<br>
<br>


<font size="3">
<b> Rules </b>
</font>

<br>
<br>

<font size="2">

The <i>Best Prediction</i> category of the contest will have two
evaluation phases. Phase I will involve an out-of-sample test of
your prediction algorithm based on some period in 2018 (as a
result the data set you are given does not include 2018). This
phase will be completed on April 8th. Phase II involves a live
contest that will run from April 8th to May 8th. It will
evaluate your prediction algorithms on real time S&P 500 returns
and will include a live leaderboard.

<br>
<br>

The <i>Most Creative</i> category will expand the judgement
criteria to topics other than just prediction. This could be
an explanation of some market phenomena, a novel trading
strategy or an insightful analysis. The submitted entries in the
form of a typewritten report will be judged by a panel of
experts consisting of practitioners and academics. 

<br> 
<br> 
<i>
A team is allowed to participate in one or both of
the contest categories.  You are encouraged to participate in
both!  
</i> 
</font>

<br>
<br>

<font size="3">
<b> Office Hours </b>
</font>

<br>
<br>
<font size="2">
Our PSTAT PhD candidate Aditya Maheshwari will be available
during office hours to provide help with your progress in either
of the contest categories. Aditya's office hours will be
announced soon! Send all questions to 
<a href="mailto:erpcontest@gmail.com" target="_top">erpcontest@gmail.com</a>.
</font>


<br>
<br>

<font size="3">
<b> Data </b>
</font>


<br>
<br>

<font size="2">
The ERP contest is about prediction of the stock market. The
objective is to build a predictive model for weekly S&P 500
returns. For this purpose Hull Tactical is providing you with 
this <a href="dataset.csv">data set</a>
of variables that may aid this task. 
There are numerous ways to build a prediction model, ranging from a
simple linear regression to more sophisticated methods from
machine learning. The research team at Hull Tactical has
described some of their experiences with S&P 500 prediction in the
following articles:
<br>
<br>
<a href="https://papers.ssrn.com/sol3/papers.cfm?abstract_id=3050254">Return Predictability and Market-Timing: A One-Month Model</a> 
<br>

<a href="https://papers.ssrn.com/sol3/papers.cfm?abstract_id=3165669">Seasonal Effects and Other Anomalies</a> 
<br>

<a href="https://papers.ssrn.com/sol3/papers.cfm?abstract_id=2609814">A Practitioner's Defense of Return Predictability</a> 
<br>
<br>

The data file above contains various financial variables over a
span of 1952-2017. A brief description of each of these variables may be
found <a href="variables.pdf">here</a>. To get started on building an intuition as to why
these may hold predictive power, you may look at the
<a href="https://en.wikipedia.org/wiki/Baltic_Dry_Index">Baltic
Dry Index</a> (BDIY), the
<a href="https://en.wikipedia.org/wiki/VIX">Volatility Index</a> (VIX),
<a href="https://en.wikipedia.org/wiki/Calendar_effect">calendar
effect</a> (SIM, TOM) and 
<a href="http://hulbertratings.com/stock-sentiment">sentiment
index</a> (Hulbert).
You can find all of these variables in the description files
linked above.
</i>
</font>

<br>
<br>

<i> Please do not use the Hull Tactical data set for any purpose
other than the ERP contest.</i>



<br>
<br>


<font size="3">
<b> Contact </b>
</font>

<br>
<br>

<font size="2">
<i> For contest related inquiries you may email <a href="mailto:erpcontest@gmail.com" target="_top">erpcontest@gmail.com</a>.
Please do <b>NOT</b> email the PSTAT staff or faculty with any contest related questions.
</i>
</font>

<br>
<br>
<br>
      <a href="http://www.ucsb.edu/" onclick="target='_blank'">
         <img src="./ucsb_logo.png"  width="120" alt="UCSB circle logo" style="display: block; margin: 0 auto; margin-top: 20">
      </a>  
      <br>
      <br>
      <img src="./logo_hull.png"  width="120" alt="Hull tactical logo" style="display: block; margin: 0 auto; margin-top: 20">  
   </div>
   <div class="col-sm-1">
     <!-- Empty -->
   </div>
 </div>
 
 <!-- Footer -->
 <?php include "footer.html"?>
 
</div>

</body>
</html>
