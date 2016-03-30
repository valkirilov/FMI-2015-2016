/*
Enter your query here.
*/
SELECT DISTINCT Course.title 
FROM Comments
JOIN Course ON Comments.courseID = Course.id;
