import pandas as pd

def modifySalaryColumn(employees: pd.DataFrame) -> pd.DataFrame:
    # Menggandakan nilai pada kolom salary
    employees['salary'] = employees['salary'] * 2
    
    # Mengembalikan DataFrame yang telah diubah
    return employees
