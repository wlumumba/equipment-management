#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Wed Feb 16 15:07:57 2022

@author: wycliff
"""

import pandas as pd 

data = pd.read_csv('equipment2.txt', names=range(0,3))

#%%
data = data.sort_values(0)


#%%
file = open('sortedeq.txt', 'w')
file.write(data.to_csv(index=False, header=False))
file.close()
