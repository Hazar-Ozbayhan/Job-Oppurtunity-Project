 -- Select the last names of unemployed end-users

select lastname
from end_user e
where username not in (select username
							from enduser_employer k); 

-- Select the count of HRRs that also have an end-user profile.

select count(end_user_username) as botHhrrandEsp
from hrr h
where end_user_username in (select username
					from end_user e); 
                    
 -- Select the company (or companies) that listed the highest paying job’s posting.    

select c.name
from   company c , job_posting j
where  c.CID = j.CID and j.salary = (select max(s.salary)
										from job_posting s); 
											



 -- Select the end-user that has been working at the same company for the longest period.      *********BAK BURAYA

select e.lastname , e.firstname
from end_user e , company c , employment_history h
where max(h.enddate-h.startdate) and h.CID = c.CID and h.username = e.username; 

-- Select the first name and last name of the HRRs that posted a job listing for company C.

select h.lastName , h.firstName , c.name
from job_posting j , hrr h , company c
where j.HRR_username = h.username  and j.CID = c.CID;


-- Select the number of end-users that applied to job listing J

select count(e.username)  as numberofendusers
from job_posting j , end_user e , hrr h
where j.HRR_username = h.username and h.end_user_username = e.username;


-- Select the number of applications by end-user E.

select count(a.username) as numberOfApply , a.username 
from application a , end_user e
where a.username = e.username
GROUP BY a.username;      

-- Select the username of the end-user(s) that has the maximum experience. Experience is measured by the duration of employment and does not include current employment.

select e.username 
from end_user e , employment_history h
where h.username = e.username and (enddate - startdate) = (select max(enddate - startdate)
																from employment_history h);
																
                                                                
 -- Select the highest paying job listing.                                                               

select j.JID
from job_posting j 
where j.salary = (select max(s.salary)
								from job_posting s); 
				
-- For each end-user, list the number of applications to job listings. Order the result set by count in  descending order.

select e.username , count(a.username)     -- DESCENDING ORDERA BAK
from end_user e, application a
where a.username = e.username 
GROUP BY e.username;    


-- Find the jobs those are suitable for an end user E, who is looking for a part-time job to work during the summer in Bodrum

select e.firstName , e.lastName
from end_user e , job_posting j , hrr h , company c
where j.HRR_username = h.username and h.end_user_username = e.username and j.CID = c.CID and c.address = "Bodrum" and j.contract_type = "part time"; 

-- Find the highest paying manager job with department size<50 for an end user E. 

select e.firstname , e.lastName
from end_user e , managerjobposting m , job_posting j , hrr h
where m.JID = j.JID and j.hrr_username = h.username and h.end_user_username = e.username and  j.salary = (select max(salary)
																													from job_posting j , managerjobposting m
																													where j.JID = m.JID and m.deptsize < 50); 
																																			 
-- List the open internships positions of a particular company C which allows more than 20 days.

select c.name , j.descr
from company c , job_posting j , intershipjobposting i
where j.CID = c.CID and i.minnumDays > 20 and i.JID = j.JID and c.CID = 6856119;


