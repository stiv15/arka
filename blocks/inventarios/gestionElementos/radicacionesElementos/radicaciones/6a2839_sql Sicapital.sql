SELECT PRO_RAZON_SOCIAL,PRO_NIT,PRO_DIRECCION,PRO_TELEFONO
FROM PROVEEDORES
WHERE PRO_IDENTIFICADOR='3'

 SELECT PRO_RAZON_SOCIAL,PRO_NIT,PRO_DIRECCION,PRO_TELEFONO FROM PROVEEDORES WHERE PRO_IDENTIFICADOR='3' 
 

SELECT RUB_IDENTIFICADOR, RUB_RUBRO ||' - '|| RUB_NOMBRE_RUBRO
FROM RUBROS

SELECT DEP_IDENTIFICADOR, DEP_IDENTIFICADOR ||' - ' ||DEP_DEPENDENCIA
FROM DEPENDENCIAS


SELECT DEP_DIRECCION, DEP_TELEFONO
FROM DEPENDENCIAS 
WHERE DEP_IDENTIFICADOR='3'

SELECT ORG_NOMBRE,ORG_IDENTIFICADOR
FROM ORDENADORES_GASTO 


SELECT CON_IDENTIFICADOR,CON_IDENTIFICACION ||' - '|| CON_NOMBRE 
FROM CONTRATISTAS


SELECT JEF_IDENTIFICADOR,JEF_DEPENDENCIA_PERTENECIENTE
FROM JEFES_DE_SECCION
WHERE JEF_IDENTIFICADOR='3'

SELECT JEF_INDENTIFICACION, JEF_NOMBRE ,JEF_DEPENDENCIA_PERTENECIENTEFROM JEFES_DE_SECCION WHERE JEF_IDENTIFICADOR='17' 


SELECT JEF_NOMBRE,JEF_IDENTIFICADOR
FROM JEFES_DE_SECCION



SELECT PRO_NIT 
FROM PROVEEDORES
WHERE PRO_IDENTIFICADOR='3'



SELECT DEP_DEPENDENCIA
FROM DEPENDENCIAS 
WHERE DEP_IDENTIFICADOR='3'

//---------------------------------


SELECT DIS_VIGENCIA AS valor, DIS_VIGENCIA AS vigencia
FROM DISPONIBILIDAD
GROUP BY valor
  
  
  SELECT *
  FROM DISPONIBILIDAD
GROUP BY valor



SELECT TO_CHAR(DIS_FECHA_REGISTRO,'yyyy-mm-dd') AS fecha,  DIS_VALOR
FROM DISPONIBILIDAD
WHERE DIS_IDENTIFICADOR='1029'AND DIS_VIGENCIA='2006'
AND ROWNUM = 1
--ORDER BY DIS_IDENTIFICADOR
LIMIT 1

SELECT *
FROM DISPONIBILIDAD
WHERE DIS_VIGENCIA='2016' AND DIS_FECHA_EXPEDICION<>NULL


SELECT DISTINCT DIS_IDENTIFICADOR AS identificador,DIS_NUMERO_DISPONIBILIDAD AS numero FROM DISPONIBILIDAD WHERE DIS_VIGENCIA='2015'



SELECT REP_VIGENCIA AS VALOR,REP_VIGENCIA AS VIGENCIA 
FROM REGISTRO_PRESUPUESTAL
GROUP BY REP_VIGENCIA



SELECT DISTINCT REP_IDENTIFICADOR AS IDENTIFICADOR,REP_NUMERO_DISPONIBILIDAD AS NUMERO 
FROM REGISTRO_PRESUPUESTAL
WHERE REP_VIGENCIA='2011'

SELECT TO_CHAR(REP_FECHA_REGISTRO,'yyyy-mm-dd') AS fecha,  REP_VALOR
FROM REGISTRO_PRESUPUESTAL
WHERE REP_IDENTIFICADOR='1029'AND REP_VIGENCIA='2013'
AND ROWNUM = 1

  SELECT CON_VIGENCIA AS VALOR , CON_VIGENCIA AS VIGENCIA
  FROM CONTRATISTAS
  GROUP BY CON_VIGENCIA

  SELECT CON_IDENTIFICADOR AS IDENTIFICADOR , CON_IDENTIFICACION ||'  -  '||CON_NOMBRE AS CONTRATISTA
  FROM CONTRATISTAS
  WHERE CON_IDENTIFICACION ='1026276984'
