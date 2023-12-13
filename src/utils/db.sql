-- Table des Utilisateurs
CREATE TABLE user (
    id INT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);

-- Table des Tickets
CREATE TABLE Ticket (
    ID INT PRIMARY KEY,
    Titre VARCHAR(255),
    Description TEXT,
    Statut VARCHAR(50),
    Priorite INT,
    DateCreation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CreateurID INT,
    AttribueAID INT,
    FOREIGN KEY (CreateurID) REFERENCES Utilisateur(ID),
    FOREIGN KEY (AttribueAID) REFERENCES Utilisateur(ID)
);

-- Table des Tags
CREATE TABLE Tag (
    ID INT PRIMARY KEY,
    Nom VARCHAR(50)
);

-- Table de liaison Many-to-Many entre Ticket et Tag
CREATE TABLE TicketTag (
    TicketID INT,
    TagID INT,
    PRIMARY KEY (TicketID, TagID),
    FOREIGN KEY (TicketID) REFERENCES Ticket(ID),
    FOREIGN KEY (TagID) REFERENCES Tag(ID)
);

-- Table des Commentaires
CREATE TABLE Commentaire (
    ID INT PRIMARY KEY,
    AuteurID INT,
    Contenu TEXT,
    Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TicketID INT,
    FOREIGN KEY (AuteurID) REFERENCES Utilisateur(ID),
    FOREIGN KEY (TicketID) REFERENCES Ticket(ID)
);
