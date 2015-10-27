import sys
import pandas as pd
import pickle

cvr = int(sys.argv[1])

file = open("/home/vagrant/Sites/bhackapp/app/domain/test", "rb")

predictors = ["SeenSW", "IsStarTrekFan", "Gender", "Age", "Income", "Education", "Location"]

star_wars_test = pd.read_csv("/home/vagrant/Sites/bhackapp/app/domain/star_wars_test.csv", encoding="ISO-8859-1")

alg = pickle.load(open('/home/vagrant/Sites/bhackapp/app/domain/test', 'rb'))

# Predict using the test dataset.  We have to convert all the columns to floats to avoid an error.
row = star_wars_test[predictors][star_wars_test["RespondentID"] == cvr]

predictions = alg.predict_proba(row.astype(float))[:,1]
print(predictions[0])





