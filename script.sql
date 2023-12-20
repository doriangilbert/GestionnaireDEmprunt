CREATE TABLE Utilisateur(
   Id_Utilisateur INT AUTO_INCREMENT,
   Nom VARCHAR(30)  NOT NULL,
   Prenom VARCHAR(30)  NOT NULL,
   Matricule VARCHAR(7)  NOT NULL,
   Avatar BLOB,
   Admin BOOLEAN NOT NULL,
   Email VARCHAR(50)  NOT NULL,
   Password VARBINARY(64)  NOT NULL,
   PRIMARY KEY(Id_Utilisateur),
   UNIQUE(Email)
);

CREATE TABLE Materiel(
   Id_Materiel INT AUTO_INCREMENT,
   Nom VARCHAR(30)  NOT NULL,
   Version VARCHAR(15)  NOT NULL,
   Reference VARCHAR(5)  NOT NULL,
   Photo BLOB,
   PRIMARY KEY(Id_Materiel)
);

CREATE TABLE Numero_Telephone(
   Id_Numero_Telephone INT AUTO_INCREMENT,
   Indicatif VARCHAR(4)  NOT NULL,
   Numero VARCHAR(13)  NOT NULL,
   Id_Utilisateur INT NOT NULL,
   Id_Materiel INT NOT NULL,
   PRIMARY KEY(Id_Numero_Telephone),
   UNIQUE(Id_Materiel),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel)
);

CREATE TABLE Emprunte(
   Id_Materiel INT,
   Date_de_fin DATE,
   Date_début DATE NOT NULL,
   Id_Utilisateur INT NOT NULL,
   PRIMARY KEY(Id_Materiel),
   FOREIGN KEY(Id_Materiel) REFERENCES Materiel(Id_Materiel),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur)
);
