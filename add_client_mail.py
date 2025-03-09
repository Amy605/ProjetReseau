import sys
from send_mail import envoyer_mail

def main():
    if len(sys.argv) != 3:
        print("Usage: python add_client_mail.py <email> <nom>")
        sys.exit(1)
    
    email = sys.argv[1]
    nom = sys.argv[2]
    
    sujet = "Bienvenue chez SmartTech"
    message = f"""
    Bonjour {nom},<br><br>
    Votre compte client a été créé avec succès.<br>
    Vous pouvez désormais accéder à nos services.<br><br>
    Cordialement,<br>
    SmartTech
    """
    
    envoyer_mail(email, sujet, message)

if __name__ == "__main__":
    main()
