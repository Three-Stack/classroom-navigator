# CPPNavigator

## Cal Poly Pomona CS 4800 - Software Engineering

Group project by Lorenzo Cabrera, Jeremy Embar, Zhong Ooi
<br>

## About this project

CPPNavigator is a tool designed to help find classrooms in Cal Poly Pomona. It was created as a final project for the class CS 4800 - Software Engineering.\
\
For more details and information about the project and how it works, you can visit [our page in the group repository](http://cs480-projects.github.io/teams-spring2023/Three-Stack/index.html).\
\
If you want to visit our website, you can do so at [cppnavigator.com](https://www.cppnavigator.com).

## About the code

This project was created as a group project with various assignments to complete tasks and write code unrelated to the project. We've tried to remove all unrelated and unused code from this project, but there's probably some remaining in the main code base and you can find a lot in the commit history.\
\
This project is managed by Docker, a dependency manager so we can deploy on a server easily. The project is currently deployed on an Amazon EC2 server.

## About the data

The data for each class is pulled directly from Cal Poly Pomona's database into our database. Their search functionality has tons of filters and various criteria to narrow down your search, but it's also pretty slow and not very user friendly. Our search is really fast but only has a couple options to narrow down your search. Why is ours so much faster? It's impossible to know without seeing what's going on behind the scenes at Cal Poly Pomona's website, but we're not really doing anything special.

Our main functionality, which is a feature to get directions to your class, is only available for buildings 8 and 9. This is because the floor plans are not open source, and we weren't able to get access to any other buildings for now.

## Will this get updated?

Since this is a group project for a class, the obvious answer is that as we all move on with our lives and forget about this project, we'll stop paying server and domain costs and this project will die out. The project also requires manual loading of data for each new semester, which is made easy by a script, but it's not automatic.\
\
However, if the website gains some traction and is actually useful for something, who knows. We have access to server logs so we'll see how much traffic the website gets. If there's some other reason to keep the project alive, one of us might do it.