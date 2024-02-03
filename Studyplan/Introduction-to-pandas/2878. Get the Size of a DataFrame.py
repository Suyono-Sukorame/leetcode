import pandas as pd
from typing import List

def getDataframeSize(players: pd.DataFrame) -> List[int]:
    # Mendapatkan jumlah baris dan kolom dari DataFrame
    rows, columns = players.shape
    
    # Mengembalikan hasil dalam bentuk list
    return [rows, columns]
