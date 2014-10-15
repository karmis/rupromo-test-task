<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <ul id="menu">
            <xsl:for-each select="udata/items/item">
                <xsl:variable name="id"><xsl:value-of select="@id"/></xsl:variable>
                <xsl:variable name="link"><xsl:value-of select="@link"/></xsl:variable>
                <li id="{$id}" class="">
                    <a href="{$link}">
                        <xsl:value-of select="."/>
                    </a>
                </li>
            </xsl:for-each>
        </ul>

    </xsl:template>
</xsl:stylesheet>