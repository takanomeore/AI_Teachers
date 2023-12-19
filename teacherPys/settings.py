import os
from os.path import join,dirname
from dotenv import load_dotenv

load_dotenv(verbose=True)

dotenv_path = join('../config/','.env')
load_dotenv(dotenv_path)

DBIP = os.environ.get("DB_HOST")
USN = os.environ.get("DB_USER")
PWD = os.environ.get("DB_PASSWORD")
openaiKey = os.environ.get("OPENAI_API_KEY")
