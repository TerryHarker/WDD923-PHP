SELECT *
FROM projekt 
LEFT JOIN user 
ON projekt.user_ID = user.ID


SELECT p.ID AS projektID, p.`projektname`, u.ID AS userID, u.`username` AS autor
FROM projekt AS p
LEFT JOIN user AS u
ON p.user_ID = u.ID