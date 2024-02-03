import pandas as pd

def selectData(students: pd.DataFrame) -> pd.DataFrame:
    # Memilih baris dengan student_id = 101
    selected_data = students[students['student_id'] == 101][['name', 'age']]
    
    # Mengembalikan hasil
    return selected_data
