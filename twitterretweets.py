import tweepy, sys


def twitter_auth():
    try:
        api_key = 'NiH5hMCXvz5HmRWyggIlm1Ws7'
        api_secret_key = '3N9V58KSEmtFq1V9vrSJSShXbrvMPn35byaFCE2sFjgbBQ6MBc'
        access_token = '2912185802-npXMAFlXbxEUQovKA6cvNXE0rJRCSy966aMzBcx'
        access_token_secret = 'U5Z2sCKMkTldvBBqvGJAqGxEOcFXSa3JMBCrMP9VoasE8'
    except KeyError:
        sys.stderr.write("TWITTER_* environment variable not set\n")
        sys.exit(1)
    # authorize the API Key
    authentication = tweepy.OAuthHandler(api_key, api_secret_key)

    # authorization to user's access token and access token secret
    authentication.set_access_token(access_token, access_token_secret)
    return authentication

def get_twitter_client():
    # call the api
    authentication = twitter_auth()
    api = tweepy.API(authentication)
    return api


if __name__ == '__main__':
    total = 0
    user = sys.argv[1]
    api = get_twitter_client()
    for status in tweepy.Cursor(api.home_timeline, screen_name=user, ).items(10):
        total += status.retweet_count
    print(total)