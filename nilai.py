def garis():
    print("=============================")

#urut input garis
a = int(input("Nilai A : "))
b = int(input("Nilai B : "))
c = int(input("Nilai C : "))
d = int(input("Nilai D : "))

#acdc
urut = [a,b,c,d]
asc = sorted(urut)
dsc = sorted(urut, reverse=True)

#Max Min Rata Rata Rata
max = max(a,b,c,d)
min = min(a,b,c,d)
rata_rata = (a+b+c+d)/4
garis()
# output
print ("Urutan nilai Ascending :", asc)
print ("Urutan nilai Descending :", dsc)
print ("Nilai MAX :", max)
print ("Nilai MIN :", min)
print ("Nilai  :", rata_rata)