import pandas as pd

def renameColumns(students: pd.DataFrame) -> pd.DataFrame:
    # Mengubah nama kolom sesuai dengan petunjuk
    students.rename(columns={'id': 'student_id', 'first': 'first_name', 'last': 'last_name', 'age': 'age_in_years'}, inplace=True)
    
    # Mengembalikan DataFrame yang telah diubah
    return students
