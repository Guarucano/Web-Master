<?xml version="1.0" encoding="UTF-8"?> 
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
<xsl:template match="/"> 
<HTML> 
<HEAD></HEAD> 
<BODY> 
<H1 align="center">Nombres</H1> 
<TABLE align="center" border="1"> 
	<tr>
    <td>
    	<th>ID</th>
     <xsl:for-each select="escuela/alumno/numero_ID">
     	<tr>-<xsl:value-of select="."/></tr> 
 	 </xsl:for-each>
 	</td>
 	<td> 
 		<th>Nombre</th>
     <xsl:for-each select="escuela/alumno/nombre">
     	<tr>-<xsl:value-of select="."/></tr> 
 	 </xsl:for-each>
 	</td>
 	<td> 
 		<th>Apellido</th>
     <xsl:for-each select="escuela/alumno/apellido">
     	<tr>-<xsl:value-of select="."/></tr> 
 	 </xsl:for-each>
 	</td>
 	<td> 
 		<th>Cedula</th>
     <xsl:for-each select="escuela/alumno/cedula">
     	<tr>-<xsl:value-of select="."/></tr> 
 	 </xsl:for-each>
 	</td>
 	<td>
 	<th>Telefono</th> 
     <xsl:for-each select="escuela/alumno/telefono">
     	<tr>-<xsl:value-of select="."/></tr> 
 	 </xsl:for-each>
 	</td>

 	 
        
    	
         
 	
 	</tr>
</TABLE>
</BODY>
</HTML>
</xsl:template>
</xsl:stylesheet>
