import pandas as pd

def dropMissingData(students: pd.DataFrame) -> pd.DataFrame:
    # Menghapus baris dengan nilai yang hilang pada kolom name
    result = students.dropna(subset=['name'])
    
    # Mengembalikan DataFrame yang telah diubah
    return result
