
import mysql.connector
from mysql.connector import Error
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import numpy as np

def generateMetrics():
    try:
        conn = mysql.connector.connect(host='localhost', database='workbook', user='root', password='')
        if conn.is_connected():
            cursor = conn.cursor()
            cursor.execute("SELECT JobDescription FROM jobpostings")
            result = cursor.fetchall()  # list, each element is tuple 
            new = map(lambda x: ''.join(x).encode('utf-8'), result) # join tuple, then rmv unicode 
            new = tuple(new) # convert to tuple again 
            conn.commit()
            tfidf_vectorizer = TfidfVectorizer()
            tfidf_matrix = tfidf_vectorizer.fit_transform(new)
            model = cosine_similarity(tfidf_matrix, tfidf_matrix)
            np.savetxt('model.csv', model, delimiter=",", fmt='%1.3f')
            return model
        else: 
            print('cannot connect to DB')             
    except Error as e:
        print(e)
 
    finally:
        cursor.close()
        conn.close()

model = generateMetrics()
