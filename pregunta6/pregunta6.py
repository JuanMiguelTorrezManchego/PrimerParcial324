# -*- coding: utf-8 -*-
"""
Created on Mon Apr 25 01:52:14 2022

@author: Miguel
"""

import psycopg2 as pc 
conexion = pc.connect (user ="postgres",
                       password = "123456",
                       host="127.0.0.1",
                       port = "5432",
                       database = "mibasemigueltorrezmanchego")
cursor = conexion.cursor()
sql = "select avg(case when tp.departamento = '01' then promedio end) Sucre, avg(case when tp.departamento = '02' then promedio end) LaPaz, avg(case when tp.departamento = '03' then promedio end) Cochabamba, avg(case when tp.departamento = '04' then promedio end) Oruro, avg(case when tp.departamento = '05' then promedio end) Potosi, avg(case when tp.departamento = '06' then promedio end) Tarija, avg(case when tp.departamento = '07' then promedio end) SantaCruz, avg(case when tp.departamento = '08' then promedio end) Beni, avg(case when tp.departamento = '09' then promedio end) Pando from inscripcion ti , persona tp where ti.ciestudiante = tp.ci"
cursor.execute(sql)
registrosp = cursor.fetchall()

sql = "select avg(case when tp.departamento = '01' then nota1 end) Sucre, avg(case when tp.departamento = '02' then nota1 end) LaPaz, avg(case when tp.departamento = '03' then nota1 end) Cochabamba, avg(case when tp.departamento = '04' then nota1 end) Oruro, avg(case when tp.departamento = '05' then nota1 end) Potosi, avg(case when tp.departamento = '06' then nota1 end) Tarija, avg(case when tp.departamento = '07' then nota1 end) SantaCruz, avg(case when tp.departamento = '08' then nota1 end) Beni, avg(case when tp.departamento = '09' then nota1 end) Pando from inscripcion ti , persona tp where ti.ciestudiante = tp.ci"
cursor.execute(sql)
registros1 = cursor.fetchall()

sql = "select avg(case when tp.departamento = '01' then nota2 end) Sucre, avg(case when tp.departamento = '02' then nota2 end) LaPaz, avg(case when tp.departamento = '03' then nota2 end) Cochabamba, avg(case when tp.departamento = '04' then nota2 end) Oruro, avg(case when tp.departamento = '05' then nota2 end) Potosi, avg(case when tp.departamento = '06' then nota2 end) Tarija, avg(case when tp.departamento = '07' then nota2 end) SantaCruz, avg(case when tp.departamento = '08' then nota2 end) Beni, avg(case when tp.departamento = '09' then nota2 end) Pando from inscripcion ti , persona tp where ti.ciestudiante = tp.ci"
cursor.execute(sql)
registros2 = cursor.fetchall()

sql = "select avg(case when tp.departamento = '01' then nota3 end) Sucre, avg(case when tp.departamento = '02' then nota3 end) LaPaz, avg(case when tp.departamento = '03' then nota3 end) Cochabamba, avg(case when tp.departamento = '04' then nota3 end) Oruro, avg(case when tp.departamento = '05' then nota3 end) Potosi, avg(case when tp.departamento = '06' then nota3 end) Tarija, avg(case when tp.departamento = '07' then nota3 end) SantaCruz, avg(case when tp.departamento = '08' then nota3 end) Beni, avg(case when tp.departamento = '09' then nota3 end) Pando from inscripcion ti , persona tp where ti.ciestudiante = tp.ci"
cursor.execute(sql)
registros3 = cursor.fetchall()

print(registros1)
print(registrosp)
print("\t\tSucre\tLa paz\tCochabamba\t Oruro\t Potosi\t Tarija\t Santa Cruz\t Beni\t Pando\t")

print("nota1\t",registros1[0][0],"\t",registros1[0][1],"\t",registros1[0][2],"\t",registros1[0][3],"\t",registros1[0][4],"\t",registros1[0][5],"\t",registros1[0][6],"\t",registros1[0][7],"\t",registros1[0][8],"\t")
print("nota2\t",registros2[0][0],"\t",registros2[0][1],"\t",registros2[0][2],"\t",registros2[0][3],"\t",registros2[0][4],"\t",registros2[0][5],"\t",registros2[0][6],"\t",registros2[0][7],"\t",registros2[0][8],"\t")
print("nota3\t",registros3[0][0],"\t",registros3[0][1],"\t",registros3[0][2],"\t",registros3[0][3],"\t",registros3[0][4],"\t",registros3[0][5],"\t",registros3[0][6],"\t",registros3[0][7],"\t",registros3[0][8],"\t")
print("promedio\t",registrosp[0][0],"\t",registrosp[0][1],"\t",registrosp[0][2],"\t",registrosp[0][3],"\t",registrosp[0][4],"\t",registrosp[0][5],"\t",registrosp[0][6],"\t",registrosp[0][7],"\t",registrosp[0][8],"\t")


cursor.close()
conexion.close()