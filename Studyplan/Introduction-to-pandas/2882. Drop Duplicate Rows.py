import pandas as pd

def dropDuplicateEmails(customers: pd.DataFrame) -> pd.DataFrame:
    # Menghapus baris duplikat berdasarkan kolom email
    result = customers.drop_duplicates(subset=['email'])
    
    # Mengembalikan DataFrame yang telah diubah
    return result
