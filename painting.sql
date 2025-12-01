
/*table 1 - paintings, table 2 - artists, table 3 - customers, table 4 - Submission */
CREATE TABLE paintings (
    painting_id     INT PRIMARY KEY AUTO_INCREMENT,
    title           VARCHAR(255) NOT NULL,
    artist          VARCHAR(255),
    year_created    INT,
    medium          VARCHAR(100),    
    style           VARCHAR(100),     
    location        VARCHAR(255),     
    value_euro      DECIMAL(15,2),   
);

/* painting_id is primary key*/

INSERT INTO paintings ( painting_id, title, artist, year_created, medium, style, location, value_euro) VALUES
(111111, 'Birds', 'Emily Mucko', 2007, 'oil paints', 'landscape', 'Kosovo', 54000,  ),
(111112, 'Bridge City', 'Siobhan Nelson', 2005, 'waterpaints', 'portrait', 'London', 35000, ),
(111113, 'Cerulean Coast', 'Genaviv Oliver Alfred  ', 2010, 'acrylics', 'landscape', 'Paris', 14000, ),
(111114, 'Sunrise Industry', 'Paul Bauld', 2007, 'waterpaints', 'portrait', 'Warsaw', 9000, ),
(111115, 'Treaty Stone', 'Micky Cashen', 2010, 'waterpaints', 'landscape', 'Kosovo', 10000,  ),
(111116, 'The Cathedral', 'Rome Santos', 2007, 'waterpaints', 'landscape', 'London', 4000,  );

CREATE TABLE artists (
 artist_id   VARCHAR(255),  PRIMARY KEY AUTO_INCREMENT,
 artist_name  VARCHAR(255),
 paintings_made  INT,
 email VARCHAR(255),
 );
 
 INSERT INTO artists ( artist_id, artist_name, paintings_name, email) VALUES 
 (A1212, 'Emily Mucko',4 , 'EmilyM@yahoo'),
 (A1213, 'Siobhan Nelson', 2, 'Siobhan1Nelly@gmail'),
 (A1214, 'Genaviv Oliver Alfred', 3, 'GenOLiverAlfred19@yahoo'),
 (A1215, 'Paul Bauld', 1, 'PaulB13@yahoo'),
 (A1216, 'Micky Cashen', 5, 'Mick1997@yahoo');
 (A1216, 'Rome Santos', 2, 'RomeSantos05@yahoo');
 
 
 CREATE TABLE Patrons (
    patrons_id     VARCHAR(255), PRIMARY KEY,
	patrons_name   VARCHAR(255),
    phone_num       VARCHAR(30),
    donations INT,
);
INSERT INTO Patrons (patrons_id, patrons_name, phone_num, donations) VALUES 
(P5121, 'Brendan Hans', '01 999 54637', 98000 ), 
(P5122, 'Nanda O Sullivan','00 997 90940', 6000 ), 
(P5123, 'Angel Pican', '03 423 43342', 20000 ), 
(P5124, 'Jake Halligan','12 327 33362', 1600 ), 
(P5125, 'Alex Orlik', '12 328 49484', 1400 ), 
(P5126, 'Ava O Mahony','09 898 97323', 7 );

 

CREATE TABLE submissions (
    submission_id   INT PRIMARY KEY,
    painting_id     INT,
    submission_date DATE,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (painting_id) REFERENCES paintings(painting_id)
);
INSERT INTO submissions (submission_id, painting_id, submission_date, ) VALUES
(2001, 1121, '2023-01-15' ),
(2002, 1122, '2023-02-10' ),
(2003, 1123, '2023-03-05' ),
(2004, 1124, '2023-04-21' ),
(2005, 1125, '2023-05-30' );





