CREATE TABLE Materiel(
   Reference VARCHAR(5) ,
   Nom VARCHAR(30)  NOT NULL,
   Photo BLOB,
   CPU_nombre_coeurs SMALLINT,
   CPU_frequence DECIMAL(3,2)  ,
   Ecran_frequence SMALLINT,
   Ecran_taille DECIMAL(3,2)  ,
   RAM_frequence SMALLINT,
   RAM_memoire SMALLINT,
   Stockage SMALLINT,
   Version VARCHAR(15)  NOT NULL,
   PRIMARY KEY(Reference)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Numero_Telephone(
   Id_Numero_Telephone INT AUTO_INCREMENT,
   Indicatif VARCHAR(4)  NOT NULL,
   Numero VARCHAR(13)  NOT NULL,
   PRIMARY KEY(Id_Numero_Telephone)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Ordinateur(
   Reference VARCHAR(5) ,
   GPU_memoire SMALLINT,
   GPU_frequence DECIMAL(3,2)  ,
   PRIMARY KEY(Reference),
   FOREIGN KEY(Reference) REFERENCES Materiel(Reference)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Telephone(
   Reference VARCHAR(5) ,
   Photo_MP DECIMAL(4,2)  ,
   Id_Numero_Telephone INT,
   PRIMARY KEY(Reference),
   UNIQUE(Id_Numero_Telephone),
   FOREIGN KEY(Reference) REFERENCES Materiel(Reference),
   FOREIGN KEY(Id_Numero_Telephone) REFERENCES Numero_Telephone(Id_Numero_Telephone)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Tablette(
   Reference VARCHAR(5) ,
   Photo_MP DECIMAL(4,2)  ,
   PRIMARY KEY(Reference),
   FOREIGN KEY(Reference) REFERENCES Materiel(Reference)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Utilisateur(
   Matricule VARCHAR(7) ,
   Nom VARCHAR(30)  NOT NULL,
   Prenom VARCHAR(30)  NOT NULL,
   Avatar BLOB,
   Admin BOOLEAN NOT NULL,
   Email VARCHAR(50)  NOT NULL,
   Password VARCHAR(50)  NOT NULL,
   Id_Numero_Telephone INT,
   PRIMARY KEY(Matricule),
   UNIQUE(Id_Numero_Telephone),
   UNIQUE(Email),
   FOREIGN KEY(Id_Numero_Telephone) REFERENCES Numero_Telephone(Id_Numero_Telephone)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Emprunte(
   Reference VARCHAR(5) ,
   Date_de_fin DATE,
   Date_debut DATE NOT NULL,
   Matricule VARCHAR(7)  NOT NULL,
   PRIMARY KEY(Reference),
   FOREIGN KEY(Reference) REFERENCES Materiel(Reference),
   FOREIGN KEY(Matricule) REFERENCES Utilisateur(Matricule)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;