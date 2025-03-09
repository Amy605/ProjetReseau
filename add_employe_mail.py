import sys
from send_mail import envoyer_mail

def main():
    if len(sys.argv) != 3:
        print("Usage: python email_add_employe.py <email> <nom>")
        sys.exit(1)
    
    email = sys.argv[1]
    nom = sys.argv[2]
    
    sujet = "Bienvenue chez SmartTech"
    message = f"""
    Bonjour {nom},<br><br>
    Vous avez été ajouté avec succès dans notre système.<br>
    Bienvenue dans l'équipe SmartTech !<br><br>
    Cordialement,<br>
    SmartTech
    """
    
    envoyer_mail(email, sujet, message)

if __name__ == "__main__":
    main()
