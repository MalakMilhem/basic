Hotel project based on yii2 framowrk basic template
============================

I write the project using yii2 framework using the basic template.
I thought about how we can centralize the code and make in readable and maintainable
 in the future so I createed small library it's responsibility to handle all the outside apis.
 and return the data to the corresponding model. now we have just one api  . with different 
 query string but in future we will have more that one. so we can immplement different apis
 and maintain them in one central location.
 
 and I thought that this labrary just to give the models the requested data so it must not 
 send the actual request this role should be done by anothe component.So I implement the webService
 library to send the request. Note that this library didn't know what the actual data is
 it just send the request.
 
 and becouse I useed yii2 framourk I go through mvc design pattern so I have one model 
 which pass the data to controllers. and the views files just to render the result to the users or clients
 the conctollers  request the data from models and pass them to views. and in furture if there is 
 any bussiness login I prefer to put it in the controllers.
 I create two controllers one of them is siteControllers which it in future must hahandle 
 login/logout actions and hotelController which deal with hotel model
 
 
 there is some notes I didn't do but I wich to do them likelike :
 1)link lat and long attitude to google map for each hotel;
 2) send and email or push notification to useres when price of their favorite hotel drop
 3) make crop jobs that give us data for the most comfortable hotes and display them to users
 
 somethings I couldn't find :
 1) I don't fine limit for the requested objects. for exmple I ned to retrive 10 hotel per request
 to solve this problem I go thtrow loop and cut off the limit I want ...
 2) the api didn't give me larg url's for hotels images .so I go throw the real site and explore that the 
 images saved in same directories but in different names so I replace the one I get from the api to large one
 
 
 General info :
 I have around two year in web development as asoftware engineer.
 the most programming language I used is php and this is the main reason
  I chose it.
  yii2 framework is very useful framework that structure your code by the mvc design pattern and 
  by encapsulate your data and classes .
