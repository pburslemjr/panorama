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
count = 0
total = 0.0
for item in reddit.redditor(user).submissions.top('all'):
    total = total + item.upvote_ratio
    count = count + 1

print(round(total / count, 2)*100)
