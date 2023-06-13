import pandas as pd 
import numpy as np
import time
import json
import geocoder
import openpyxl as xls
import sys
 

# 提取地址列的数据
addresses = sys.argv[1] 

# 创建空的结果列表
results = []

# 遍历每个地址并进行地理编码
 
    # 验证地址是否存在
if pd.notna(addresses):
        # 地理编码
        g = geocoder.arcgis(addresses)
        
        # 验证地理编码是否成功
        if g.ok:
            # 提取经纬度
            lat = g.latlng[0]
            lng = g.latlng[1]
            
            # 构造结果字典
             
            
            # 将结果添加到结果列表
             

print(int(lat))

 