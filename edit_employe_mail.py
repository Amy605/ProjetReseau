import sys
from send_mail import envoyer_mail

def main():
    if len(sys.argv) != 3:
        print("Usage: python email_edit_employe.py <email> <nom>")
        sys.exit(1)
    
    email = sys.argv[1]
    nom = sys.argv[2]
    
    sujet = "Mise à jour de votre profil chez SmartTech"
    message = f"""
    Bonjour {nom},<br><br>
    Votre profil a été mis à jour avec succès.<br>
    Veuillez vérifier vos nouvelles informations dans le système.<br><br>
    Cordialement,<br>
    SmartTech
    """
    
    envoyer_mail(email, sujet, message)

if __name__ == "__main__":
    main()
