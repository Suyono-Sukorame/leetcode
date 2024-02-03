import pandas as pd

def createBonusColumn(employees: pd.DataFrame) -> pd.DataFrame:
    # Membuat kolom baru 'bonus' dengan nilai gaji yang diubah menjadi dua kali lipat
    employees['bonus'] = employees['salary'] * 2
    
    # Mengembalikan DataFrame yang telah diubah
    return employees
