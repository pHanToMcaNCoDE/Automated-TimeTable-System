# Automated-Timetable-System (ATTS)

ATTS is an automated system that generates timetables at lesser times, compared to the maual
method of generating timetables. In order for a timetable to be created, certain constraints most be 
adhere to in order to obtain an optimal or near optimal solution. These
conditions can be divided as soft and hard constraints. Hard constraints are constraints 
that must not be violated in order to obtain an optimal solution. For instance; A timetable 
o two lectures are to be conducted at the same time in the same venue (class-clash constraint). 

ATTS is a web-based system that was developed with the intention of solving the problem of the time and effort
taken to allocating available resources (lecturers, classrooms, etc.). This project was 
implemented using web technologies such as; HTML, CSS, JS, PHP and MYSQL. PHP was the language used to
implement the algorithm used in the system.

### ALGORITHM USED

FIREFLY ALGORITHM: A firefly algorithm is an algorithm inspired by the flashing behaviour of firelfies. This algorithm is used
to solve optimization problems. The firefly begins by creating a population of fireflies, and moving the
less attractive fireflies to the more attractive fireflies. This algorithm also gets it's inspiration from the "Law of
intensity of light" (I = k / r^2).

### THE SYSTEM

<img width="1440" alt="Github ATTS" src="https://github.com/pHanToMcaNCoDE/Automated-Timetable-System/assets/113244998/2d34c495-96e4-4103-ae0d-e1dc878bf439">


The front-end was built with a basic notification system using PHP. This was implemented into the system to guide the timetable admin
into the system, to let them know when they're performing a task correctly or otherwise. The timetable is generated at the click of a button. The system
provide the adim with 5 modules, the department, semester, courses, lecturers, and tiemtable module. Each module was implemented with the CRUD operation, which
will give the admin the ability to create, read, update and delete data that they have provided. The data provided by the admin will be received through web-forms
on the system. This data will be stored in a database. The timetable that will be generated depends on the available data provided by the timetable admin.


# CRUD OPERATIONS 
<img width="1440" alt="Screenshot 2023-06-08 at 02 06 11" src="https://github.com/pHanToMcaNCoDE/Automated-Timetable-System/assets/113244998/2cd07a26-605a-42bd-87c4-a21ae0886323">

<img width="1440" alt="Screenshot 2023-06-08 at 17 37 51" src="https://github.com/pHanToMcaNCoDE/Automated-Timetable-System/assets/113244998/83ce8038-aee1-4fa9-bb71-48f14bb9f451">


The images shown above portray the CRUD operations that have been implemented on the system 
(The admin can Create, Read, Update and Delete data in the system).


# THE RESULTING TIMETABLES

<img width="1440" alt="Screenshot 2023-06-08 at 17 38 06" src="https://github.com/pHanToMcaNCoDE/Automated-Timetable-System/assets/113244998/2845c1ee-33d4-4c57-bf78-12b260f559be">



