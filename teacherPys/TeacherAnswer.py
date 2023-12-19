import sys
import settings

OpenAIKey = settings.openaiKey

def main(argv):
    #args = sys.argv
    if(argv[1] == '1'):
        chatGPTAnswer("あなたは家庭教師です。",argv[2])
    if(argv[1] == '2'):
        chatGPTAnswer(argv[2],argv[3])

def chatGPTAnswer(assist, question):
    from openai import OpenAI

    OpenAI.api_key = OpenAIKey
    client = OpenAI()

    try:
        response = client.chat.completions.create(
            model="gpt-3.5-turbo",
            messages = [
                {"role":"assistant", "content":assist},
                {"role":"user", "content":question},
            ],
        )

        print(response.choices[0].message.content)
    except Exception as e:
        print(e)

if __name__ == '__main__':
    sys.exit(main(sys.argv))
