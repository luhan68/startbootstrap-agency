# app function

from flask import Flask
from config import Config
from flask_sqlalchemy import SQLAlchemy
from flask_migrate import Migrate
from flask_bootstrap import Bootstrap


app = Flask(__name__)
app.config.from_object(Config)
db = SQLAlchemy(app)
migrate = Migrate(app,db)
bootstrap = Bootstrap(app)


# routes
from flask import Flask,render_template,request,flash,url_for,redirect

import random
def evaluate(output):
    # TODO: stub function now, need compare result
    return len(output)

@app.route('/', methods=['GET', 'POST'])
def home():
    return render_template('index.html')


@app.route('/rules', methods=['GET', 'POST'])
def rules():
    return render_template('rules.html')


@app.route('/data', methods=['GET', 'POST'])
def data():
    return render_template('data.html')


@app.route('/submit', methods=['GET','POST'])
def submit():
    form = UserForm()
#    #TODO: check for the time of submit
    if ((form.teamname.data != None) and (form.output.data != None)):
        teamname = form.teamname.data
        users = User.query.filter_by(teamname=teamname).all()
        if len(users) != 0:
            errors = ["One team can only submit one time per day."]
            return render_template('submit.html', form=form, errors=errors)

        post = User(teamname=form.teamname.data, output=form.output.data)
        post.set_score(len(form.teamname.data))
        print(len(form.teamname.data))
        db.session.add(post)
        db.session.commit()
        #TODO: check the output format
        flash('Your post is now live!')
        messages = ['Your post is now live!']
        return render_template('submit.html',form=form,messages = messages)
    else:
        errors = ["You should fill out all field above."]
        return render_template('submit.html',form=form,errors=errors)

@app.route('/leaderboard', methods=['GET', 'POST'])
def leaderboard():
    solution = User.query.order_by(User.output.desc()).all()
    for i in solution:
        print(i)

    return render_template("leaderboard.html", data = solution)


# models
class User(db.Model):
    id = db.Column(db.Integer, primary_key = True)
    teamname = db.Column(db.String(40))
    output = db.Column(db.String(240))
    time = 0
    score = 0

    def __init__(self,teamname,output):
        self.teamname = teamname
        self.output = output
        self.time = 0

    def set_score(self,score):
        self.score = score
    
    def __repr__(self):
        return 'Teamname: {}\nOutput: {}\nScore: {}\nTime: {}\n'.format(self.teamname,self.output,self.score,self.time)

    def get_teamname(self):
        return str(self.teamname)

# forms
from flask_wtf import FlaskForm
from wtforms import SelectField, TextAreaField,StringField, PasswordField, BooleanField, SubmitField
from wtforms.validators import ValidationError, DataRequired, Email, EqualTo,Length

class UserForm(FlaskForm):
    teamname = TextAreaField('Teamname: ', validators=[DataRequired(), Length(min=1, max=40)])
    output = TextAreaField('Enter your output: ', validators=[DataRequired(), Length(min=1, max=240)])
    submit = SubmitField('Submit')
