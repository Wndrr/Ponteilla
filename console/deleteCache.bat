cd ..
FOR /D %%p IN ("%cd%\cache\*.*") DO rmdir "%%p" /s /q
RD %cd%\cache