import pandas as pd

def fillMissingValues(products: pd.DataFrame) -> pd.DataFrame:
    # Mengisi nilai yang hilang dengan 0 pada kolom quantity
    products['quantity'].fillna(0, inplace=True)
    
    # Mengembalikan DataFrame yang telah diisi nilai yang hilang
    return products
