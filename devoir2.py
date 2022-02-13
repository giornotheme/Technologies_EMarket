import random
import re

#Initialisations de nos fonctions
def trouve(mot : str, lettres : list[str]) -> bool:
    #''.join(lettres) est une façon de convertir lettres (qui est une liste) en string. De cette manière la comparaison entre lettres et mot est possible
    if ''.join(lettres) == mot:
        print("Félicitations ! Vous avez trouvé le mot :", mot)
        return True
    else:
        return False

def get_lettre() -> str:
    user_lettre = input("\nTapez '/stop' pour arrêter le jeu\n\nQuelle lettre choisissez-vous :")
    #Nous créons une commande pour que l'utilisateur puisse quitter le jeu avec "/stop"
    if user_lettre == "/stop":
        exit()
    else:
        return user_lettre

#Cette fonction permet de vérifier que la lettre tapée par l'utilisateur existe dans le mot recherché
def check_letter_in_word(lettre : str, mot : str) -> bool:
    if lettre in mot:
        return True
    else:
        return False

#Cette fonction permet de limiter les essais de l'utilisateur
def pendu(essai : int) -> bool:
    #Lorsque le nombre d'essai arrive à 6, l'utilisateur est considéré comme perdant et on renvoie True
    if essai == 6:
        return True
    else:
        return False


def mot_mystere() -> None:
    #Initialisation de nos variables
    tuple_mot = ("souris", "ordinateur", "clavier", "bouteille", "photo", "brosse", "bijoux", "parfum", "crayon", "manette", "portable", "rideaux", "peluche")
    lettres = []
    choix = True
    nb_essai = 0
    mot_ordi = random.choice(tuple_mot)

    #Initialisation de la longueur de la liste où se trouvera les lettres de l'utilisateur
    i = 0
    while i<len(mot_ordi):
        lettres.append("") #si "mot_ordi" contient 6 lettres par exemple, "lettres" sera donc une liste de 6 éléments vides
        i += 1

    #Lancement du jeu, tant que choix == True le jeu ne s'arrête pas
    while choix == True:
        if trouve(mot_ordi, lettres) == False and pendu(nb_essai) == False: #Si l'utilisateur n'a pas trouvé le mot on n'arrête pas le jeu
            user_lettre = get_lettre()
            if len(user_lettre)<2: #On vérifie que l'utilisateur n'écrit pas plusieurs caractères à la suite
                if check_letter_in_word(user_lettre, mot_ordi) == True: #On vérifie que la lettre tapée par l'utlisateur est bien dans le mot choisi par l'ordi
                    #On trouve l'index de "user_lettre" dans "mot_ordi"
                    matches = re.finditer(user_lettre, mot_ordi)
                    matches_index = [match.start() for match in matches]
                    #puis une fois qu'on a les index, on remplit notre liste "lettres" avec "user_lettre"
                    for i in matches_index:
                        lettres[i] = user_lettre
                    print(lettres)
                else: #Si la lettre tapée par l'utilisateur n'est pas dans le mot choisi
                    nb_essai = nb_essai + 1 #alors on augement le nombre d'essaie de 1
                    print(lettres)
                    #Ensuite on vérifie combien d'essais l'utilisateur a fait, puis en fonction du nombre d'essai, on dessin un pendu différent.
                    if nb_essai == 1:
                        print("\n  -----\n  |   |\n  O   |\n      |\n      |\n      |\n  ---------")
                    elif nb_essai == 2:
                        print("\n  -----\n  |   |\n  O   |\n |    |\n      |\n      |\n  ---------")
                    elif nb_essai == 3:
                        print("\n  -----\n  |   |\n  O   |\n  |   |\n /    |\n      |\n  ---------")
                    elif nb_essai == 4:
                        print("\n  -----\n  |   |\n  O   |\n  |   |\n / \  |\n      |\n  ---------")
                    elif nb_essai == 5:
                        print("\n  -----\n  |   |\n  O   |\n /|   |\n / \  |\n      |\n  ---------")
                    elif nb_essai == 6:
                        print("\n  -----\n  |   |\n  O   |\n /|\  |\n / \  |\n      |\n  ---------")
                        print("\nVous avez perdu, fin de la partie")
                    else:
                        print("Erreur: Vous n'êtes pas supposés avoir plus de 6 essais")
            else:
                print("Veuillez entrer qu'un seul caractère à la fois")
        else: #Une fois que "lettres" correspond parfaitement au "mot_ordi", on met choix à False pour terminer le jeu
            choix = False

mot_mystere()

