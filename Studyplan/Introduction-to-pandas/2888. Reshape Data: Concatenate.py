import pandas as pd

def concatenateTables(df1: pd.DataFrame, df2: pd.DataFrame) -> pd.DataFrame:
    # Menggabungkan dua DataFrame secara vertikal
    result_df = pd.concat([df1, df2], ignore_index=True)
    
    # Mengembalikan DataFrame hasil penggabungan
    return result_df
