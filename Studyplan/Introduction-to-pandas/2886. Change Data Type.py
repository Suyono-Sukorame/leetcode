import pandas as pd

def changeDatatype(students: pd.DataFrame) -> pd.DataFrame:
    # Mengubah tipe data kolom grade menjadi integer
    students['grade'] = students['grade'].astype(int)
    
    # Mengembalikan DataFrame yang telah diubah
    return students
