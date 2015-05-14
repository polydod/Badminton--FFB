DROP TABLE  Joueur ;
DROP TABLE  Club ;
DROP TABLE  Ville ;
DROP TABLE  Categorie ;

#CATEGORIE
CREATE TABLE  Categorie  (
	 categorie_id  int NOT NULL PRIMARY KEY,
	 nom_categorie  varchar(25) NOT NULL,
	 age_debut  int NOT NULL,
	 age_fin  int NOT NULL
);

#VILLE
CREATE TABLE  Ville  (
   ville_id  int NOT NULL PRIMARY KEY,
   nom_ville  varchar(100)
);

#CLUB
CREATE TABLE  Club  (
   club_id  int NOT NULL PRIMARY KEY,
   ville_id  int NOT NULL,
  
  FOREIGN KEY (ville_id)
		REFERENCES Ville(ville_id)
		
);

#JOUEUR
CREATE TABLE  Joueur  (
   licence  int NOT NULL PRIMARY KEY,
   nom_joueur  varchar(50) NOT NULL,
   prenom_joueur  varchar(50) NOT NULL,
   date_naissance  DATE NOT NULL,
   date_premiere_inscription  DATE NOT NULL,
   club_id  int NOT NULL,
   categorie_id  int NOT NULL,
  
  FOREIGN KEY (club_id) 
        REFERENCES Club(club_id),
		
  FOREIGN KEY (categorie_id) 
        REFERENCES Categorie(categorie_id)
		
);





