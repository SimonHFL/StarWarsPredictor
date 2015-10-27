import sys
import pandas as pd
import pickle
import json
import numpy as np

data = json.loads(sys.argv[1])

row = pd.DataFrame(data, index=[0])

alg = pickle.load(open('/home/vagrant/Sites/bhackapp/app/domain/test', 'rb'))

# Predict using the test dataset.  We have to convert all the columns to floats to avoid an error.

predictions = alg.predict_proba(row.astype(float))[:,1]

print(predictions[0])






