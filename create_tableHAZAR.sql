create table End_user (
username VarChar(20) not null,
password VarChar(20) not null,
firstName VarChar(20) not null,
lastName VarChar(20) not null,
military_service_status VarChar(20) not null,
primary key (username)
);

create table End_user_email (
username VarChar(20) not null,
email VarChar(100) not null,
primary key (username,email),
foreign key (username) references End_user (username)
);

create table HRR (
end_user_username VarChar(20) not null,
firstName VarChar(20) not null,
lastName VarChar(20) not null,
password VarChar(20) not null,       -- buraya bak
username VarChar(20) not null,
primary key (username),
foreign key (end_user_username) references End_user (username)
);

create table Company (
CID int(20) not null,          
name VarChar(20) not null,
address VarChar(20) not null,
phone int(11) not null,       
primary key (CID)
);

create table Employment_History (
username VarChar(20) not null,
enddate date not null,            
position VarChar(20) not null,  
startdate date not null,         
CID int(20) not null,           
primary key (username,startdate,CID),
foreign key (username) references End_user (username),
foreign key (CID) references Company (CID)
);

create table Job_posting (
JID int(20) not null,           
descr VarChar(20) not null,       
salary double DEFAULT null,
phone numeric(11) not null,        
is_manOrIntern char(1),       
contract_type VarChar(20) not null,
openingdate date not null,
duration VarChar(20) not null,      
CID int(20) not null,           
HRR_username VarChar(20),
primary key (JID),
foreign key (CID) references Company (CID),
foreign key (HRR_username) references HRR (username)
);

create table Application (
JID int(20) not null,            
username VarChar(20) not null,
dateapplied date not null,         
resume boolean not null,          
univ VarChar(20) not null,
program VarChar(20) not null,
gpa double not null,    
standing boolean not null, 
numDays int(255) not null, 
primary key (JID,username),
foreign key (JID) references Job_posting (JID),
foreign key (username) references End_user (username) 
);

create table ManagerJobPosting (
JID int(20) not null,             
deptname VarChar(20) not null,
deptSize int(20) not null,      
primary key (JID),
foreign key (JID) references Job_posting (JID)
);

create table EndUser_Employer (
CID int(20) not null,        
username VarChar(20) not null,
startdate date not null,
primary key (CID,username),
foreign key (CID) references Company (CID),
foreign key (username) references End_user (username)
);

create table CoursesForInternshipAppss (
CIAID int(20) not null,         
JID int(20) not null,          
userName VarChar(20) not null, 
course VarChar(20) not null,   
primary key (CIAID),
foreign key (JID) references Job_posting (JID),
foreign key (username) references End_user (username)
);

create table IntershipJobposting (
JID int(20) not null,          
minnumDays int(255) not null,
primary key (JID),
foreign key (JID) references Job_posting (JID)
);
