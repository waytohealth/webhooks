# Webhooks Interview

This repository is used as a base for the interviews we are conducting.

## Context for the project

The upcoming BEST Change study is a Randomized Controlled Trial evaluating whether standard messaging or tailored messaging is more effective at preventing diabetes. In the tailored messaging arm, they administer a survey early in the study to gather participants’ behavioral characteristics (such as what character traits they value, and whether they have healthy habits) and use those to tailor a message with variations like, “Your [self-control OR persistence] can be a powerful part of building [healthy habits/the healthy habits you’ve been working on]”. The study sends out biweekly messages for a year, and with numerous permutations for each message, they have thousands of unique messages that can be sent out.

Way to Health has a robust rules engine, allowing researchers or clinical program managers to configure the behavior of intervention with rules like:

```
If {{@Engagement Level Variable}} = High AND {{@focus}} = ”self-control”
THEN Send Message ‘Your self-control can be a powerful part of building healthy habits’
```

This study was originally built using the Way to Health rules engine, with lots and lots (and lots) of logic conditions evaluating various permutations of ~6 different variables to decide which message to send when. It was overwhelming to view, and when the page started causing out of memory errors simply trying to display all that logic, we realized that this might not be the best approach. If/else can work if you have half a dozen scenarios; not so much when you have dozens or hundreds. At some point, looking up messages in a program-specific table makes more sense than building thousands of if/else conditions. 

This concept of program-specific message lookup tables isn’t something we have, and introducing something so custom to the data model to our core application would create a maintenance nightmare. We’ve chosen instead to create a microservice specific to this study which will choose the messages based on those variables and return a response with the correct message.

## Important files

We have the basics of an app scaffolded already with a simple HelloWorld controller.  

The messages file named `messages.csv` is a file full of rules to determine which message to respond with.  

Our goal for the day is to figure out the best way to implement a reliable service endpoint to convert an incoming web request to the expected response.

## What we are and aren't evaluating

* There is no specific expectation of how far we’ll get during this short time window. (In fact, we entirely expect not to finish the task.)  
* This is not a knowledge test. You wouldn’t program without Google, and we won’t make you interview without Googling. (We probably need to look at the same documentation as you.)  
* In fact, this isn’t a test at all. Our goal is to collaborate with you on this, and to see what it’s like working with you. Yes, you will probably be driving most of the time while pairing, but our goal is to help and collaborate, not to catch you making mistakes.  
* We will be looking at whether you can come up with solutions that keep testability front and center, and show technical proficiency and problem-solving skills.

## Technologies used

We are not expecting you to already be proficient in any of these, but if you have time to familiarize yourself with them beforehand, it might be helpful:
* [Symfony Framework](https://symfony.com/releases/5.2)
* [Doctrine ORM](https://www.doctrine-project.org/projects/doctrine-orm/en/2.9/index.html)
* [PHPUnit](https://phpunit.de/announcements/phpunit-8.html)

## Preparation

For this exercise, we need a PHP environment set up to run the application. 

This can be done one of two ways: Using your machine or ours.

* If you’d like to use your own computer: Please have this repository checked out and running in the PHP environment of your choice. (PHPStorm, SublimeText, vim, VSCode; docker, Homebrew, XAMPP, they’re all good.) You’ll need MySQL running as well.
* If you’d rather use our computer, that works too (and is probably easier).

## Setup
To pull in the current dependencies, composer should be installed.
Once it is, you can run `composer install` to pull down all of the base vendor files.

After that, you should be able to start the project by running the following console command:
`symfony server:start`

