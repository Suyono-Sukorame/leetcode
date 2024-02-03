import pandas as pd

def selectFirstRows(employees: pd.DataFrame) -> pd.DataFrame:
    # Menampilkan tiga baris pertama dari DataFrame
    first_three_rows = employees.head(3)
    
    # Mengembalikan hasil
    return first_three_rows
