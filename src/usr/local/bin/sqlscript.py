import sqlite3

#clienttable = vpn_settings
#servertable = vpn_settings
conn = sqlite3.connect("/var/data/hsmm-pi/hsmm-pi.sqlite")
#conn.text_factory = str
#conn.row_factory = sqlite3.Row
cursor = conn.cursor()
text_file = open("sqlvtund.conf", "w")

callsignsql = "SELECT callsign FROM vpn_settings where id=? "
cursor.execute(callsignsql, [("10")])
callsign = cursor.fetchone()

#clientpwdsql = "SELECT password FROM vpn_settings where id=? "
#cursor.excure(clientpwdsql, [("10")])
#clientpwd = cursor.fetchone()

serveripsql = "SELECT server_ip FROM vpn_settings where id=? "
cursor.execute(serveripsql, [("10")])
serverip = cursor.fetchone()

print callsign  # or use fetchone()
#text_file.write("callsign ")
text_file.write(', '.join(callsign))
text_file.write(" {\n")
text_file.write("   passwd  ")
#text_file.write(', '.join(clientpwd))
text_file.write(";\n")
text_file.write("   device tun0;\n")
text_file.write("   persist yes;\n")
text_file.write("   type tun;\n")
text_file.write("   proto tcp;\n")
text_file.write("   up {\n")
text_file.write("     ifconfig %% ")  #note i need to figure out how to make it so I can add "

text_file.write("server_ip ")
text_file.write(', '.join(serverip))
text_file.close()
