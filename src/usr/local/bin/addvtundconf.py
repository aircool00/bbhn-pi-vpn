# this is to write to the vtund.conf file for BBHN -pi VPN
# By Bruce Wattendorf

print "Creating a text file with the write () method"
text_file = open("vtund.conf", "w")

text_file.write("options {\n")
text_file.write("  type stand;\n")
text_file.write("  port 5000;\n")
text_file.write("  ifconfig /sbin.ifconfig;\n")
text_file.write("  route   /sbin/route;\n")
text_file.write("  firewall  /sbin/ipchains;\n")
text_file.write("  syslog daemon;\n")
text_file.write("  timeout 60;\n")
text_file.write("}\n")
text_file.write("\n")
text_file.write("default (\n")
text_file.write("  compress yes;\n")
text_file.write("  speed 0;\n")
text_file.write("  stat yes;\n")
text_file.write("}\n")
text_file.write("\n")
text_file.close()

