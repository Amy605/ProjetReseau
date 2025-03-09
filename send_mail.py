import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

# Configuration SMTP
SMTP_SERVER = "mail.smarttech.sn"
SMTP_PORT = 587
SMTP_USER = "notifications@smarttech.sn"
SMTP_PASS = "Passer34@"


def envoyer_mail(destinataire, sujet, message):
    try:
        msg = MIMEMultipart()
        msg['From'] = SMTP_USER
        msg['To'] = destinataire
        msg['Subject'] = sujet
        
        msg.attach(MIMEText(message, 'html'))
        
        server = smtplib.SMTP(SMTP_SERVER, SMTP_PORT)
        server.starttls()
        server.login(SMTP_USER, SMTP_PASS)
        server.sendmail(SMTP_USER, destinataire, msg.as_string())
        server.quit()
        
        print(f"E-mail envoyé avec succès à {destinataire}")
    except Exception as e:
        print(f"Erreur d'envoi de l'e-mail : {e}")
