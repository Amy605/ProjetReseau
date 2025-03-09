import sys
from send_mail import envoyer_mail

def main():
    if len(sys.argv) != 3:
        print("Usage: python delete_employe_mail.py <email> <nom>")
        sys.exit(1)
    
    email = sys.argv[1]
    nom = sys.argv[2]
    
    sujet = "Suppression de votre compte chez SmartTech"
    message = f"""
    Bonjour {nom},<br><br>
    Votre compte a été supprimé de notre système.<br>
    Cordialement,<br>
    SmartTech
    """
    
    envoyer_mail(email, sujet, message)

if __name__ == "__main__":
    main()
