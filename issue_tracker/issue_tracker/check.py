import os

true = "✔️"
false = "❌"
test = []

db = open("db/issue_tracker_db.db", "r")
if db:
    print("Database file exists")
    test.append(true)

else:
    print("Database file does not exist")
    test.append(false)

db.close()

db_file = open("db/issue_tracker_db.db", "r")
if os.stat("db/issue_tracker_db.db").st_size == 0:
    print("Database file is empty")
    test.append(false)
else:
    print("Database file is not empty")
    test.append(true)

db_file.close()

css = os.path.exists("css")
if css:
    print("CSS file exists")
    test.append(true)
else:
    print("CSS file does not exist")
    test.append(false)

print("------------------------------------------------------------")
for i in test:
    if i == true:
        print("Test Passed", end="✔️\n")
    else:
        print("Test Failed", end="❌\n")

print("------------------------------------------------------------")
