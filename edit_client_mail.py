import sys
from send_mail import envoyer_mail

def main():
    if len(sys.argv) != 3:
        print("Usage: python edit_client_mail.py <email> <nom>")
        sys.exit(1)
    
    email = sys.argv[1]
    nom = sys.argv[2]
    
    sujet = "Mise à jour de votre profil client chez SmartTech"
    message = f"""
    Bonjour {nom},<br><br>
    Vos informations ont été mises à jour avec succès.<br>
    Veuillez vérifier votre profil pour voir les modifications.<br><br>
    Cordialement,<br>
    SmartTech
    """
    
    envoyer_mail(email, sujet, message)

if __name__ == "__main__":
    main()
