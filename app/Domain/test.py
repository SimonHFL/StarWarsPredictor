import sys
import pandas as pd
import pickle


cvr = sys.argv[1]
"""
if cvr == "1234":
    print(1)
else:
    print(0)
"""

file = open("/home/vagrant/Sites/bhackapp/app/domain/test", "rb")

predictors = ["SeenSW", "IsStarTrekFan", "Gender", "Age", "Income", "Education", "Location"]

star_wars_test = pd.read_csv("/home/vagrant/Sites/bhackapp/app/domain/star_wars_test.csv", encoding="ISO-8859-1")

alg = pickle.load(open('/home/vagrant/Sites/bhackapp/app/domain/test', 'rb'))
print(1)
# Predict using the test dataset.  We have to convert all the columns to floats to avoid an error.
predictions = alg.predict_proba(star_wars_test[predictors].astype(float))[:,1]
print(2)
predictions[predictions > 0.5] = 1
predictions[predictions <= 0.5] = 0

predictions = predictions.astype(int)
print(4)
submission = pd.DataFrame({
        "Id": star_wars_test["RespondentID"],
        "IsStarWarsFan": predictions
    })

print(submission.head(10))


