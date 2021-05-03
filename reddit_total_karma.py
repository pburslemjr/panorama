import praw
import sys


reddit = praw.Reddit(
    client_id = "zQRAZ2w8auswmA",
    client_secret = "PdMHBRHsjrFeJWrlMWTwblrlBa60FQ",
    password = "P4ssword!",
    user_agent = "script by u/Fweii",
    username = "Fweii",
)

user = sys.argv[1]
print(reddit.redditor(user).comment_karma + reddit.redditor(user).link_karma)